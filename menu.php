<?php  include 'header.php'; 
session_start();
if(!$_SESSION['id']){
    header("location: index.php");
}
if(isset($_GET['logout'])){
    
    unset($_SESSION['id'] );
    header("location: index.php");
}


?>
<div class="row container bg-color">
<!--    <div class="col-md-11 "  >
        <div id="mySidenav" class="sidenav ">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="Dashboard.php">Dashboard</a>
            <a href="view.php">User</a>

            <a href="form.php">Create User</a>
              <a href="#">Contact</a>
        </div>
        <span style="font-size:30px;cursor:pointer;color: white" onclick="openNav()">&#9776; menu</span>

    </div>-->
    <div  class="col-md-10">
        <ul id="menubar">
            <li><a href="Dashboard.php">Dashboard</a></li>
            <li><a href="modalView.php">Users</a></li>
            <li><a href="form.php">Create User</a></li>
        </ul>
    </div>
    <div class="text-right" >
        <button  id="logout" class="btn "> <a  href="?logout">Logout</a></button>
    </div> 


</div>

<!--<script type="text/javascript">
        function openNav() {
            document.getElementById("mySidenav").style.width = "390px";
        }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>-->
</body>
</html> 

