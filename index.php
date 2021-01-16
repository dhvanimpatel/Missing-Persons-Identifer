<!DOCTYPE html>
<html>
   <title>Missing Person Identifier</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
   <body>
      <center>
         <body background="https://hougumlaw.com/wp-content/uploads/2016/05/light-website-backgrounds-light-color-background-images-light-color-background-images-for-website-1024x640.jpg">
            <div class="w3-container" id="about">
               <div class="w3-content" style="max-width:700px">
                  <h5 class="w3-center w3-padding-64">
                     <span class="w3-tag w3-wide">The Missing Persons Indentifier</span>
                  </h5>
                  <p>Welcome to the MPI Website. This website is designed to help you identify missing individuals from the NamUs database. This technology is derived from using the AWS Rekognition service. By running machine learning software on the image you input, the system is able to match the given image with one from the NamUs database.</p>
                  <img src="https://www.deccanherald.com/sites/dh/files/styles/article_detail/public/article_images/2018/08/09/images1533754598.png?itok=cEoqsNNz" style="width:100%;max-width:1000px" class="w3-margin-top">
                  <p>	<strong>Service hours:</strong> everyday 9am to 10am</p>
                  <p>	<strong>Questions:</strong> Email to dhvanineer01@gmail.com</p>
               </div>
            </div>
            <div class="w3-container" id="service">
            <div class="w3-content" style="max-width:700px">
               <h3 class="w3-center w3-padding-40">
                  <span class="w3-tag w3-wide">Try it Out</span>
               </h3>
               <p>
               <p>please input an image and select upload.</p>
               <form action="upload.php" method="post" enctype="multipart/form-data"> 
                  <label for="email">Enter your email that you want to recieve notification from:</label>
                  <input type="text" id="email" name="email">
                  <br/>
                  <br/>
                  <label for="fileToUpload">Upload image(avoid symbols):</label>
                  <input type="file" name="fileToUpload" id="fileToUpload"> 
                  <input type="submit" value = "Identify" name = "submit">
               </form>
               </p>
            </div>
      </center>
      <!-- Links (sit on top) -->
      <div class="w3-top">
      <div class="w3-row w3-padding w3-black">
      <div class="w3-col s6 w3-green w3-center">	<a href="#about" class="w3-button w3-block  w3-black">ABOUT</a>
      </div>
      <div class="w3-col s6 w3-green w3-center">	<a href="#service" class="w3-button w3-block w3-black">SERVICE</a>
      </div>
      </div>
      </div>
   </body>
</html>
