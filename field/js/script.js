// function change(element){
//     // element.innerHTML='Confirm'
    
//     if(element.classList.contains('normal')){
//         element.classList.toggle('normal');
//         // element.innerHTML='<input type="date" id="userDate" placeholder="Select Date"><button class="work-button cngDate" onclick="change(this.parentElement);">Confirm</button>';
//         element.innerHTML='<form method="POST" action="/php-lab3/admin.php"><input type="date" id="userDate" name="date" placeholder="Select Date"><input type="submit" class="work-button cngDate" onclick="location.reload();"value="Confirm" name="submit"></form>';
        
//     }
//     else{
//         element.innerHTML='<?php echo $client["date"]; ?><button class="work-button cngDate" onclick="change(this.parentElement);">Change</button>'
//         element.classList.toggle('normal');
//     }
    
// }
// var update_ID;
// var update_ID2;

// // getting id no
// function status_update(id){
//     this.update_ID=id;
//     // alert(update_ID);
//     document.cookie="IDD="+id;

//   }


  



// function change2(element){
//     // element.innerHTML='Confirm'
//     if(element.classList.contains('normal2')){
//         element.classList.toggle('normal2');
//         element.innerHTML='<form method="POST" action="/php-lab3/admin.php"><select class="custom-select" name="mechanic" id="custom-select" required><option value="" disabled selected hidden>Choose Your Mechanic</option><option value="Shaktiman">Shaktiman</option><option value="Riyadh">Riyadh</option><option value="Ejaz">Ejaz</option><option value="Aosaf">Aosaf</option><option value="Meshal">Meshal</option><option value="Aukik">Aukik</option></select><input type="submit" class="work-button cngMech" onclick="location.reload();"value="Confirm" name="submit"></form>';
        
//     }
//     else{
//         element.classList.toggle('normal2');
//         element.innerHTML='<?php echo $client["mechanic"]; ?><button class="work-button cngMech" onclick="change2(this.parentElement);">Change</button>'
        
//     }
    
// }

// function status_update2(id){
//     this.update_ID2=id;
//     // alert(update_ID);
//     document.cookie="IDD2="+id;

//   }
  var cstatus='';
  console.log(cstatus);
  // alert(cstatus);
  function changeStatus(e){
    if(e==="closed"){
      
      
      alert(cstatus);
      // alert('its closed!');
      
        
    }
   

  }
  
// document.querySelector(".banner-header").style.color="red";
if(cstatus==="closed"){
  document.getElementById("appo").style.display="none";
}


let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}