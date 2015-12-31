 <div id="sidebar">
          <div id="sideBarTitle">
              Catégories
          </div>
          <ul id="categories">
      
       <?php
        $categs = $DB->query('SELECT * FROM categories');

foreach ($categs as $categ) {

    $id_categorie = $categ->id_categorie;
    $name_categorie = $categ->name_categorie;

    echo "<li ><a href='index.php?category=$id_categorie'>$name_categorie</a></li>";
  }
     ?>
          </ul>
      <div id="sideBarTitle">
            Les plus grandes marques
          </div>
            <ul id="categories">
      
       <?php
        $brands = $DB->query('SELECT * FROM brands');

  foreach ($brands as $brand) {

    $id_brand = $brand->id_brand;
    $name_brand = $brand->name_brand;

    echo "<li><a href='index.php?brand=$id_brand'>$name_brand</a></li>";
  }
     ?>

      </ul>
        </div>