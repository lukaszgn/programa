<?php include_once 'config.php' ?>
<?php include_once 'menu_generator.php' ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Łukasz Szykowny">
        <link rel="icon" href="../../../../favicon.ico">
        <title>Zadanie 5</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/base.css" >
    </head>
    <body>
        <div id="menu">
			<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
			  <a class="navbar-brand pb-2" href="#">Home</a>
			  <div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
				  <li class="nav-item dropdown">
				  <?php $main_menu = new MainMenu($database, $host, $port, $db, $user, $pass); echo $main_menu->generateMenu(); ?>
				</ul>
			  </div>
			</nav>
        </div>
		
        <main role="main" class="container">
            <div class="task-container">
                <div class="row">
                    <div class="col-md-12 mb-3"><h1 class="centered">Zadanie 3</h1></div>
                </div>
                <div class="row">
                    <div class="col-md-12 order-md-1">
                        <h2 class="mb-3">Formularz</h2>
                        <div class="row">
                            <form class="needs-validation" novalidate="" id="testedForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">Imię</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                                        <div class="invalid-feedback">
                                            Imię jest wymagane.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">Nazwisko</label>
                                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                                        <div class="invalid-feedback">
                                            Nazwisko jest wymagane.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="age">Wiek</label>
                                        <input type="text" class="form-control" id="age" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            Wiek jest wymagany i powinien być z zakresu 18-99.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="state">Płeć</label>
                                        <select class="custom-select d-block w-100" id="state" required="">
                                            <option value="">Wybierz...</option>
                                            <option>Kobieta</option>
                                            <option>Mężczyzna</option>
                                        </select>
                                        <div class="invalid-feedback">
                                              Płeć musi być wybrana.
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="agreement">
                                    <label class="custom-control-label" for="agreement">Wyrażam zgodę na przetwarzanie danych osobowych zawartych w niniejszym dokumencie do realizacji procesu rekrutacji zgodnie z ustawą z dnia 10 maja 2018 roku o ochronie danych osobowych (Dz. Ustaw z 2018, poz. 1000) oraz zgodnie z Rozporządzeniem Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE (RODO).</label>
                                </div>
                                <hr class="mb-4">

                                <button class="btn btn-primary btn-lg btn-block" type="button" onclick="validateForm()">Zapisz</button>
                          </form>
                        </div>
                  </div>
                </div>
            </div>
        </main>

        <script src="js/jquery.min.js"></script>
        <script src="js/validator.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>

    </body>
</html>
