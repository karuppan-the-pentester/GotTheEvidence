# Got The Evidence

This CTF story is based on the Resident Evil Movie.
There is a devil company name "Umbrella" which involves illegal activities a lot. So the player needs to find the evidence that the "Umbrella" is doing some illegal stuff. 
<br>

## Scenario 

Here, The user know only there is website for the "Umbrella" company.
There is no details were exposed.

<br>

## Challenges

<br> Entry Gate
<br> Pathfinder's Secret Passage
<br> Shadow Have Codes
<br> Remote Command Mastery
<br> Kingmaker's Ascendancy 



## Vulnerabilities

<br><input type="checkbox" checked> Sql Injection
<br><input type="checkbox" checked> Sensitive Data Exposure
<br><input type="checkbox" checked> Hash Cracking
<br><input type="checkbox" checked> File Upload
<br><input type="checkbox" checked> User Privelege Escalation


## Deployment

``` bash
docker compose build 
```

``` bash
docker compose up
```


## Write-Up

### 1] First We see the Login Only <br>
![Check the desc](./Docs/Screenshot%20(71).png)
### 2] View Page source leads some info about developer<br>
![Check the desc](./Docs/Screenshot%20(72).png)
### 3] use sqli paylod<br>
![Check the desc](./Docs/Screenshot%20(73).png)
### 4] The data from the user login<br>
![Check the desc](./Docs/Screenshot%20(74).png)
### 5] check the trash<br>
![Check the desc](./Docs/Screenshot%20(76).png)
### 6] download sql<br>
### 7] Decrypt the hash using hashcat using their rockyou.txt<br>
### 8] Use those credential for login as admin<br>
### 9] password might changed so bypass login by sqli and use password from the hash for the adminCheck 
```
' OR '1'='1' -- -
```

```
' OR id=(SELECT id FROM (SELECT id FROM user_details ORDER BY id LIMIT 1 OFFSET 1) AS t) -- -
```
( i really planned a different thing , i planned to use the stored xss and create a admin login simulation for being victimized in the XSS attack. But due to some docker network issue , i changed the plan)<br>
### 10] login to admin account<br>
![Check the desc](./Docs/Screenshot%20(84).png)
### 11] see the gallery<br>
![Check the desc](./Docs/Screenshot%20(85).png)
### 12] upload option supports all data<br>
![Check the desc](./Docs/Screenshot%20(86).png)
### 13] upload the rce file and the flag is in the user directory directory<br>
### 14] I'm using powny shell for RCE and i escalated the privelege using the authorised SSH Login<br>
![Check the desc](./Docs/Screenshot%20(88).png)

# ThankYou
Thanks for the oppurtunity 
after a long time i worked this much
