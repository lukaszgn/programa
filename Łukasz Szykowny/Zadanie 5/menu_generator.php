
<?php
class MainMenu
{
	private $menuElements = array();
	private $conn = null;
	private $dns;
	
    function __construct($database, $host, $port, $db, $user, $pass) {
		$this->dsn = "$database:host=$host;port=$port;dbname=$db;user=$user;password=$pass";
    }
	
	private function connect()
	{
        try
        {
            $this->conn = new PDO($this->dsn);
            if($this->conn){
				return true;
            }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
		return false;
	}
	
	/*
	 * Create array of menu elements
	*/
	private function getMenuElements()
	{
		$conn_state = $this->connect();
        try
        {
            if($conn_state)
			{
				$sql = "SELECT *, (CASE WHEN parent_id IS null THEN true ELSE false END) AS first FROM menu ORDER BY first DESC, parent_id ASC, id ASC";
				$stmt = $this->conn->query($sql);
				
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					if($row['parent_id'] == null)
					{
						$this->menuElements[$row['id']] = array('name' => $row['name'], 'childs' => array());
					}
					else
					{
						$this->menuElements = $this->addElementToParent($this->menuElements, $row['id'], $row['name'], $row['parent_id']);
					}
				}
				
				if($stmt === false){
					die("Error executing the query: $sql");
				}
            }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
			return false;
        }
		return true;
	}
	
	/*
	 * Add childs to parent
	*/
	private function addElementToParent($elements, $id, $name, $parent_id)
	{
		if(isset($elements[$parent_id]))
		{
			$elements[$parent_id]['childs'][$id] = array('name' => $name, 'childs' => array());
			return $elements;
		}
		else
		{
			foreach($elements as &$element)
			{
				$element['childs'] = $this->addElementToParent($element['childs'], $id, $name, $parent_id);
			}
			return $elements;
		}
	}

	/*
	 * Create html code for menu
	*/
	private function createMenu($menu, $first = false)
	{
		$html = '';
		foreach($menu as $element){
			if(count($element['childs']) == 0)
			{
				  $html .= "<li class=\"\"><a class=\"dropdown-item\" href=\"#\">".$element['name']."</a></li>";
			}
			else{
				if($first)
					$html .= "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">".$element['name']."</a>";
				else
					$html .= "<li class=\"dropdown-submenu\"><a class=\"dropdown-item dropdown-toggle\" href=\"#\"  >".$element['name']."</a>";
				
				$html .= "<ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">";
				$html .= $this->createMenu($element['childs']);

				$html .= $first ? "</ul>" : "</li></ul>";
			}
		}

		return $html;
	}
	
	/*
	 * Generate main menu
	*/
	public function generateMenu()
	{
		$state = $this->getMenuElements();
		if($state)
			return $this->createMenu($this->menuElements, true);
		else
			return false;
	}

}