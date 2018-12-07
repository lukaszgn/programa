--POTGRESQL 9.5
CREATE TABLE menu
(
  id serial,
  name text,
  parent_id int,
  ordering int,
  CONSTRAINT pk_menu PRIMARY KEY (id),
  CONSTRAINT fk_menu_parent_id FOREIGN KEY (parent_id)
      REFERENCES menu (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);

INSERT INTO menu(id, name, parent_id, ordering)
VALUES  (1, 'Kategoria główna', null, 0),
        (2, 'Podkategoria 1', 1, 0),
        (3,'Produkt A', 2, 0),
        (4, 'Produkt B', 2, 1),
        (5,'Podkategoria 2', 1, 0),
        (6, 'Produkt C', 5, 0),
        (7,'Produkt D', 5, 1)