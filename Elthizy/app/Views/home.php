<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kantin Elthizy</title>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const mainElement = document.querySelector(".main");
      mainElement.style.opacity = 1;
      mainElement.style.transform = "translateY(0)";
    });

    document.getElementById("about-link").addEventListener("click", function(e) {
      e.preventDefault();
      const mainElement = document.querySelector(".main");
      mainElement.style.opacity = 0;
      mainElement.style.transform = "translateY(20px)";
      setTimeout(function() {
        window.location.href = "about.html";
      }, 500);
    });
  </script>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Arial", sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
      background-size: cover;
    }

    .main {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .navbar {
      width: 100%;
      background-color: #4CAF50;
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    }

    .navbar a {
      text-decoration: none;
      font-size: 18px;
      margin: 0 20px;
      color: #fff;
    }

    .navbar h3 {
      font-size: 24px;
      margin: 0;
    }

    .welcome {
      text-align: center;
      margin-top: 90px;
      font-size: 35px;
      font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
      color: black;
    }

    .welcome h1 {
      margin-bottom: 25px;
    }

    span {
      font-size: 21px;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .button-container {
      text-align: center;
      margin-top: 50px;
    }

    button {
      width: 250px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 15px;
      padding: 10px;
      cursor: pointer;
      font-size: 18px;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="navbar">
    <h3>Elthizy Food</h3>
    <a href="home" id="home-link">HOME</a>
    <a href="about" id="about-link">ABOUT</a>
    <a href="menu" id="menu-link">MENU</a>
    <a href="history" id="history-link">RIWAYAT</a>
    <a href="customer_profile" id="profile-link">PROFILE</a>
    <a href="/auth/logout" id="logout-link">LOGOUT</a>
  </div>

  <div class="main">
    <div class="welcome">
      <h1>Welcome to Elthizy</h1>
      <span>
        <p>Selamat Datang di Kantin Elthizy</p>
      </span>
      <div class="button-container">
        <a href="menu">
          <button>Mau Pesan Apa Hari Ini?</button>
        </a>
      </div>
    </div>
  </div>
</body>

</html>