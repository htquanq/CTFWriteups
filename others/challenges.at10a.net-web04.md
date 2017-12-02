# CTF writeup
The challenge will be available on `http://challenges.at10a.net:8080/web04/`

# Source code of login script (login.js)
`http://challenges.at10a.net:8080/web04/login.js`

This is JSFuck challenge, to decode it:
1) Remove the last () from script
2) Open console in browser type: `console.log(String(script-above))`

# Here is the decoded script:
```javascript 
		function anonymous() {
    	var username = prompt("Username :", "");     
    	var password = prompt("Password :", "");     
    	var TheLists = atob('bG9jaWRvbDpKc0Z1Y2tNeUJyYWlu').split(":"); // Equals to Array [ "locidol", "JsFuckMyBrain" ]
    	for (i = 0; i < TheLists.length; i++)     
    	{         
    		if (TheLists[i].indexOf(username) == 0)         
    		{             
    			var TheUsername = TheLists[0]; // Equals to locidol            
    			var ThePassword = TheLists[1]; // Equals to JsFuckMyBrain
    			if (username == TheUsername && password == ThePassword)             
    			{                 
    				alert("You can use this password to validate this challenge with BMC{}");             
    			}         
    		}         
    			else         
    			{             
    				alert("Noob");         
    			}     
    	}
		}
```
# Login with username: locidol and password: JsFuckMyBrain
# The flag is: BMC{JsFuckMyBrain} :clap::clap::clap:
