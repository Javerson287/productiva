<!DOCTYPE html> 
<html> 
  
<body> 
  
  <h4> 
      Change the text of the text field  
      ,and then click the button. 
  </h4> 
  
  <label for="domTextElement">Name: </label>
  <input type="text" id="domTextElement" > 
  
  <button type="button"  onclick="getValueInput()"> 
      click me!! 
  </button> 
  
  <p id="valueInput"></p> 

  <script> 

    const getValueInput = () =>{
      let inputValue = document.getElementById("domTextElement").value; 
      console.log(inputValue);
      document.getElementById("valueInput").innerHTML = inputValue; 
    }
    
  </script> 
</body> 
  
</html> 