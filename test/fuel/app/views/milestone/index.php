<header>
        <div class="header" >
            <div><?php echo Asset::img("goodLogo.png", array('id'=>'logo')) ?></div>
            <h1>JCC Incorporated</h1>
            <h2>An awesome company</h2>
        </div>
        <div class="navbar">
            <li><a href = "./index">Home</a></li>
            <li><a 
            <?php 
            if(checkURL()){
                echo 'href="./index.php/milestone/about"';
            }else{
                echo 'href="./about"';
            } 
            ?>>About</a></li>
            <li><a <?php 
            if(checkURL()){
                echo 'href="./index.php/milestone/colorCoordinator"';
            }else{
                echo 'href="./colorCoordinator"';
            } 
            ?>>Color Coordinator</a></li>
        </div>
    </header>

<div class="container">
    <div id="hometext">
        <p>
            Welcome to the official website of JCC Incorporated, we're happy you've made it
            to our website. Founded by three Colorado State computer science majors, this website
            is a gateway to our company. There are links to learn more about the founders of the company and to 
            an exciting color coordinate generator. The possibilities are simply endless for you to explore 
            on this website.
        </p>
    </div>
 
</div>
