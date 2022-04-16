<!DOCTYPE html>

  <head>    
  <style type="text/css"> 
     @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;800&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  min-height: 100vh;
  background: #232427;
}

.navbar {
  overflow: hidden;
  background-color: #2196f3;
  position: fixed;
  top: 0;
  width: 100%;
  z-index:1;
}

.navbar img{
  float:left;
  padding-top: 5px;
}

.navbar h3{
  float: left;
  color: #f2f2f2;
  letter-spacing: normal;
  padding-left: 20px;
  padding-top: 14px;
}

.navbar a {
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}


.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  margin-top: 30px;
}

 body .container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  max-width: 1200px;
  margin: 40px 0;
  margin-top: 35px;
}

body .container .card {
  position: relative;
  min-width: 320px;
  height: 440px;
  box-shadow: inset 5px 5px 5px rgba(0, 0, 0, 0.2),
    inset -5px -5px 15px rgba(255, 255, 255, 0.1),
    5px 5px 15px rgba(0, 0, 0, 0.3), -5px -5px 15px rgba(255, 255, 255, 0.1);
  border-radius: 15px;
  margin: 30px;
  transition: 0.5s;
}

body .container .card:nth-child(1) .box .content a {
  background: #2196f3;
}

body .container .card:nth-child(2) .box .content a {
  background: #2196f3;
}

body .container .card:nth-child(3) .box .content a {
  background: #2196f3;
}
body .container .card:nth-child(4) .box .content a {
  background: #2196f3;
}
body .container .card:nth-child(5) .box .content a {
  background: #2196f3;
}
body .container .card:nth-child(6) .box .content a {
  background: #2196f3;
}
body .container .card:nth-child(7) .box .content a {
  background: #2196f3;
}
body .container .card:nth-child(8) .box .content a {
  background: #2196f3;
}
body .container .card:nth-child(9) .box .content a {
  background: #2196f3;
}

body .container .card .box {
  position: absolute;
  top: 20px;
  left: 20px;
  right: 20px;
  bottom: 20px;
  background: #2a2b2f;
  border-radius: 15px;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  transition: 0.5s;
}

body .container .card .box:hover {
  transform: translateY(-50px);
}

body .container .card .box:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 50%;
  height: 100%;
  background: rgba(255, 255, 255, 0.03);
}

body .container .card .box .content {
  padding: 20px;
  text-align: center;
}

body .container .card .box .content h2 {
  position: absolute;
  top: -10px;
  right: 30px;
  font-size: 8rem;
  color: rgba(255, 255, 255, 0.1);
}

body .container .card .box .content h3 {
  font-size: 1.8rem;
  color: #fff;
  z-index: 1;
  transition: 0.5s;
  margin-bottom: 15px;
}

body .container .card .box .content p {
  font-size: 1rem;
  font-weight: 300;
  color: rgba(255, 255, 255, 0.9);
  z-index: 1;
  transition: 0.5s;
}

body .container .card .box .content a {
  position: relative;
  display: inline-block;
  padding: 8px 20px;
  background: black;
  border-radius: 5px;
  text-decoration: none;
  color: white;
  margin-top: 20px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  transition: 0.5s;
}
body .container .card .box .content a:hover {
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
  background: #fff;
  color: #000;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
    height: 30px;
   background-color: #2196f3;
}

.footer a{
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding-bottom: 14px;
  padding-left: 14px;
  padding-top: 3px;
  text-decoration: none;
}

.footer a:hover {
  background: #ddd;
  color: black;
}

.footer p{
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding-bottom: 14px;
  padding-right: 14px;
  padding-top: 3px;
  text-decoration: none;
}
</style>
  </head>
  <body>

    <div class="navbar">
      <img class="logo" src="https://i.postimg.cc/wvDjdZdp/logo.png" alt="image" width="3%">
      <h3 class="name">Fr. Conceicao Rodrigues Institute Of Technology</h3>
<!--      <a href="index.html">Home</a>-->
      <a href="login.html">Logout</a>
      <a href="contact.html">Contact</a>
    </div>

   <div class="main">
    <div class="container">
    <div class="card">
      <div class="box">
        <div class="content">

          <h3>5.1.1</h3>
          <p>Number of students benefited by scholarships and free ships provided by the Government during the year</p>
          <a href="5.1.1.html">Enter Data</a>
        </div>
      </div>
    </div>


    <div class="card">
      <div class="box">
        <div class="content">

          <h3>5.1.2</h3>
          <p>Number of students benefitted by scholarships, free ships etc. provided by the institution / non- government agencies during the year</p>
          <a href="5.1.2.html">Enter Data</a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="box">
        <div class="content">

          <h3>5.1.3</h3>
          <p>Capacity building and skills enhancement initiatives taken by the institution include the following
1. Soft skills, 2. Language and communication skills, 3. Life skills (Yoga, physical fitness, health and hygiene), 4. ICT/computing  skills</p>
          <a href="5.1.3.html">Enter Data</a>

        </div>
      </div>
    </div>

        
    <div class="card">
      <div class="box">
        <div class="content">

          <h3>5.1.4</h3>
          <p>Number of students benefitted by guidance for competitive examinations and career counseling offered by the Institution during the year</p>
          <a href="5.1.4.html">Enter Data</a>
        </div>
      </div>
    </div>

       
    <div class="card">
      <div class="box">
        <div class="content">

          <h3>5.2.1</h3>
          <p>Number of placement of outgoing students during the year</p>
          <a href="5.2.1.html">Enter Data</a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="box">
        <div class="content">

          <h3>5.2.2</h3>
          <p>Number of students progressing to higher education during the year</p>
          <a href="5.2.2.html">Enter Data</a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="box">
        <div class="content">

          <h3>5.2.3</h3>
          <p>Number of students qualifying in state/national/ international level examinations during the year (eg: JAM/CLAT/GATE/ GMAT/CAT/GRE/ TOEFL/ Civil Services/State government examinations)</p>
          <a href="5.2.3.html">Enter Data</a>
        </div>
      </div>
    </div>
        
    <div class="card">
      <div class="box">
        <div class="content">

          <h3>5.3.1</h3>
          <p>Number of awards/medals for outstanding performance in sports/cultural activities at university/state/national / international level (award for a team event should be counted as one) during the year.</p>
          <a href="5.3.1/index.php">Enter Data</a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="box">
        <div class="content">
       
          <h3>5.3.3</h3>
          <p>Number of sports and cultural events/competitions in which students of the Institution participated during the year (organized by the institution/other institutions)</p>
          <a href="5.3.3/index.php">Enter Data</a>
        </div>
      </div>
    </div>

  </div>

  <div class="footer">
  <a href="developers.html">Developers</a>
  <p>Student Achievements and Placement Records</p>
</div>
</div>
  </body>
</html>

