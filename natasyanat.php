
        <?php
        $servername = "0.0.0.0";
        $username = "root";
        $password = "root";
        $dbname = "natasyaform";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        $sql = "SELECT * FROM tabeluser";
        $result = $conn->query($sql);

        ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Form User</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="admin-container">
    <div class="sidebar">
      <div class="profile">
        <div class="profile-icon">👤</div>
        <h2>Admin Panel</h2>
      </div>
      <button class="menu-btn">Kelola User</button>
      <button class="menu-btn">Kelola Laporan</button>
      <button class="menu-btn logout-btn">Logout</button>
    </div>

    <div class="content">
      <h1>Kelola User</h1>
      <div class="form-container">
        <div class="form-left">
          <label for="user-type">Tipe User:</label>
          <select id="user-type">
            <option value="Gudang">Gudang</option>
            <option value="Kasir">Kasir</option>
          </select>

          <label for="user-name">Nama:</label>
          <input type="text" id="user-name" placeholder="Masukkan nama">

          <label for="user-phone">Telepon:</label>
          <input type="text" id="user-phone" placeholder="Masukkan telepon">
        </div>

        <div class="form-right">
          <label for="user-address">Alamat:</label>
          <input type="text" id="user-address" placeholder="Masukkan alamat">

          <label for="user-username">Username:</label>
          <input type="text" id="user-username" placeholder="Masukkan username">

          <label for="user-password">Password:</label>
          <input type="password" id="user-password" placeholder="Masukkan password">
        </div>
      </div>

      <div class="form-actions">
        <button class="action-btn add-btn" onclick="addUser()">Tambah</button>
        <button class="action-btn edit-btn" onclick="editUser()">Edit</button>
        <button class="action-btn delete-btn" onclick="deleteUser()">Hapus</button>
      </div>

      <div class="search-container">
        <input type="text" id="search-user" placeholder="Cari user">
        <button class="search-btn" onclick="searchUser()">Cari</button>
      </div>

      <table>
        <thead>
          <tr>
            <th>ID User</th>
            <th>Tipe User</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
          </tr>
        </thead>
        <tbody id="user-table">
            <?php
          while($row = $result->fetch_assoc()) {           
          ?>
          <tr>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["tipe"]; ?></td>
              <td><?php echo $row["nama"]; ?></td>
              <td><?php echo $row["alamat"]; ?></td>
              <td><?php echo $row["telepon"]; ?></td>
            </tr>
          <?php
              }
            ?>  
          
        </tbody>
      </table>
    </div>
  </div>

  <script src="scripts.js"></script>
</body>
</html>
<style>
/* Reset Styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Arial', sans-serif;
  background-color: #87CEEB;
  color: #333;
}

.admin-container {
  display: flex;
  width: 100%;
  height: 100vh;
}

.sidebar {
  background-color: #87CEFA;
  color: #fff;
  width: 250px;
  padding: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
}

.sidebar .profile {
  text-align: center;
  margin-bottom: 20px;
}

.sidebar .profile-icon {
  font-size: 60px;
  margin-bottom: 10px;
}

.sidebar h2 {
  font-size: 18px;
  font-weight: bold;
}

.menu-btn {
  background-color: #2c3e50;
  color: #fff;
  padding: 10px 15px;
  border: none;
  margin: 10px 0;
  width: 100%;
  text-align: left;
  cursor: pointer;
  border-radius: 5px;
  font-size: 14px;
  transition: background-color 0.3s ease;
}

.menu-btn:hover {
  background-color: #7f8c8d;
}

.logout-btn {
  background-color: #e74c3c;
  margin-top: auto;
}

.logout-btn:hover {
  background-color: #c0392b;
}

.content {
  flex: 1;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  margin: 20px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.content h1 {
  font-size: 22px;
  color: #34495e;
  margin-bottom: 20px;
}

.form-container {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

.form-left, .form-right {
  width: 45%;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input, select {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.form-actions {
  text-align: right;
  margin-bottom: 20px;
}

.action-btn {
  padding: 10px 15px;
  margin-left: 10px;
  border: none;
  border-radius: 5px;
  font-size: 14px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.add-btn {
  background-color: #2ecc71;
  color: white;
}

.add-btn:hover {
  background-color: #27ae60;
}

.edit-btn {
  background-color: #f1c40f;
  color: white;
}

.edit-btn:hover {
  background-color: #f39c12;
}

.delete-btn {
  background-color: #e74c3c;
  color: white;
}

.delete-btn:hover {
  background-color: #c0392b;
}

.search-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.search-container input {
  width: calc(100% - 80px);
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.search-btn {
  padding: 10px 15px;
  background-color: #3498db;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

table {
  width: 100%;
  border-collapse: collapse;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  overflow: hidden;
}

table th, table td {
  padding: 12px 15px;
  text-align: left;
  border: 1px solid #ddd;
}

table th {
  background-color: #34495e;
  color: white;
}

table tr:nth-child(even) {
  background-color: #f2f2f2;
}

table tr:hover {
  background-color: #ecf0f1;
  cursor: pointer;
}
</style>