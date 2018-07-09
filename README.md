# Pharmeasy Assigment


This is a basic application in which Users(Patient/Doctor/Pharmasist) can login and see medical records of a patient based on approval.

### URL
```<a href="http://13.126.68.168/pharmeasy/">Pharmeasy URL </a> ```

### Folder Structure


| Folder | Description |
| ------ | ------ |
| /apis | It consist of all the Restful API's |
| /classes | Contains all the classess |
| /helper | Basic helper functions defined |
| /views | Frontent HTMLS Forms |
| composer.json | Project dependencies list |
| config.php | Configurations- Basic structure |

# Sample Credentials!

##### Patient
  - UserName: patient1, Password: patient1
- UserName: patient2, Password: patient2

##### Doctor
  - UserName: doctor1, Password: doctor1
- UserName: doctor2, Password: doctor2

##### Pharmacist
  - UserName: pharmacist1, Password: pharmacist1
- UserName: pharmacist2, Password: pharmacist2

# Installation
- ```$ git clone https://github.com/agupta92/pharmeasy.git```
- ```$ commposer install ```
- Import SampleSQL.sql file in mysql
- Edit config.php in root folder providing mysql credentials.

### Note
- Do not rename directory after git clone
- Provide proper mysql priviledges to the user

