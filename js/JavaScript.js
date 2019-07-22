/*-----------------FUNKCIJA ZA NAVIGACIONI BAR (MOBILNE UREDJAJE)--------------------*/
function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
         x.style.display = "none";
    } 
    else {
    x.style.display = "block";
    }
}

$(document).ready(function() {   
	   $('input[name=rate]').change(function(){  
	        $('.rating').submit();  
	   });  
	  });




function myFunctionAdd() {
	if(count==1){
		
		$("#input1").css("display","block");
		count++;
		}
		else if(count==2){
			
			$("#input1").css("display","block");
			$("#input2").css("display","block");
			count++;
			
			}else if(count==3){
				
				$("#input1").css("display","block");
				$("#input2").css("display","block");
				$("#input3").css("display","block");
				count++;
				
				}else if(count==4){
					
					$("#input1").css("display","block");
					$("#input2").css("display","block");
					$("#input3").css("display","block");
					$("#input4").css("display","block");
					
					count++;
					
					}else if(count==5){
						
						$("#input1").css("display","block");
						$("#input2").css("display","block");
						$("#input3").css("display","block");
						$("#input4").css("display","block");
						$("#input5").css("display","block");
						
						
						}
}

function FunctionIM(){
	if ($('#insertmovie').css("display")=="none"){
		
			document.getElementById("insertmovie").style.display = "block";
		
		}else{
			document.getElementById("insertmovie").style.display = "none";

			}
	
}

function FunctionIA(){
	if ($('#insertactor').css("display")=="none"){
		
			document.getElementById("insertactor").style.display = "block";
		
		}else{
			document.getElementById("insertactor").style.display = "none";

			}
	
}
function FunctionDeleteMovie(){
	if ($('#deletem').css("display")=="none"){
		
			document.getElementById("deletem").style.display = "block";
		
		}else{
			document.getElementById("deletem").style.display = "none";

			}
	
}

function FunctionDU(){
	if ($('#deleteu').css("display")=="none"){
		
			document.getElementById("deleteu").style.display = "block";
		
		}else{
			document.getElementById("deleteu").style.display = "none";

			}
	
}