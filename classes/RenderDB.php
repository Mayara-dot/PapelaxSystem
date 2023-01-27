<?php
require_once ('./static/con/Con.php');
class RenderDB extends DB_CONNECT {
    public function setConn() {
        require_once ('../static/con/Con.php');
        $DB = new DB_CONNECT;
        $DB->connect();
    }
    public function renderDVD() {
        $connection = $this->getConnection();
        $query = "SELECT * FROM SCANDIWEB.DVD;";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo "<div class='card'> 
              <input type='checkbox' value='{$row['SKU']}'
              name='check_list[]' class='delete-checkbox' id=delete-checkbox >
              <p>{$row['SKU']}</p>
              <p>{$row['name']}</p>
              <p>{$row['price']} $</p>
              <p>Size: {$row['size']} MB</p>
              </div> ";
            }
          } else {
            echo " ";
          }          
    }

    public function renderBook() {
      $connection = $this->getConnection();
      $query = "SELECT * FROM SCANDIWEB.Book;";
      $result = mysqli_query($connection, $query);
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card'> 
            <input type='checkbox' value='{$row['SKU']}'
            name='check_list[]' class='delete-checkbox' id=delete-checkbox >
            <p>{$row['SKU']}</p>
            <p>{$row['name']}</p>
            <p>{$row['price']} $</p>
            <p>Weight: {$row['weight']} KG</p>
            </div> ";
          }
        } else {
          echo " ";
        }          
  }

  public function renderFurniture() {
    $connection = $this->getConnection();
    $query = "SELECT * FROM SCANDIWEB.Furniture;";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo "<div class='card'> 
          <input type='checkbox' value='{$row['SKU']}'
          name='check_list[]' class='delete-checkbox' id=delete-checkbox >
          <p>{$row['SKU']}</p>
          <p>{$row['name']}</p>
          <p>{$row['price']} $</p>
          <p>Dimension: {$row['height']}x{$row['width']}x{$row['length']}</p>
          </div> ";
        }
      } else {
        echo " ";
      }          
} 


}