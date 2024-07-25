# Got The Evidence

This CTF story is based on the Resident Evil Movie.
There is a devil company name "Umbrella" which involves illegal activities a lot. So the player needs to find the evidence that the "Umbrella" is doing some illegal stuff. 
<br>

## Scenario 

Here, The user know only there is website for the "Umbrella" company.
There is no details were exposed.

<br>


## Vulnerabilities

<br><input type="checkbox" checked> Sql Injection
<br><input type="checkbox" checked> Sensitive Data Exposure
<br><input type="checkbox" checked> Hash Cracking
<br><input type="checkbox" checked> File Upload
<br><input type="checkbox" > Privelege Escalation


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
### 3] use sqli<br>
![Check the desc](./Docs/Screenshot%20(73).png)
### 4] The data from the user login<br>
![Check the desc](./Docs/Screenshot%20(74).png)
![Check the desc](./Docs/Screenshot%20(75).png)
### 5] check the trash<br>
![Check the desc](./Docs/Screenshot%20(76).png)
![Check the desc](./Docs/Screenshot%20(77).png)
### 6] download sql<br>
![Check the desc](./Docs/Screenshot%20(78).png)
### 7] visit blog<br>
![Check the desc](./Docs/Screenshot%20(79).png)
![Check the desc](./Docs/Screenshot%20(80).png)
### 8] found comment section<br>
![Check the desc](./Docs/Screenshot%20(81).png)
![Check the desc](./Docs/Screenshot%20(82).png)
### 9] bypass login by sqli and found the adminCheck credential
```
' OR '1'='1' -- -
```

```
' OR id=(SELECT id FROM (SELECT id FROM user_details ORDER BY id LIMIT 1 OFFSET 1) AS t) -- -
```
( i really planned a different thing , i planned to use the stored xss and create a admin login simulation for being victimized in the XSS attack. But due to some docker network issue , i changed the plan)<br>
![Check the desc](./Docs/Screenshot%20(83).png)
### 10] login to admin account<br>
![Check the desc](./Docs/Screenshot%20(84).png)
### 11] see the gallery<br>
![Check the desc](./Docs/Screenshot%20(85).png)
### 12] upload option supports all data<br>
![Check the desc](./Docs/Screenshot%20(86).png)
![Check the desc](./Docs/Screenshot%20(87).png)
### 13] upload the rce file and the flag is in the root directory<br>
![Check the desc](./Docs/Screenshot%20(88).png)

# ThankYou
Thanks for the oppurtunity 
after a long time i worked this much
Due to my end sem examination, I can't do as i planned 
but i nearly completed what i thought
I'm to work as a team and correct my self
