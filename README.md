# phpbebuilder

# About PHP Battleye Builder #
 
This is a tools that has been writen to help admins manage the task or updating battleye filters when updates come out.

More information can be found on the EpochMod forum located bellow

#### Main features ####
#### ToDo List ####
#### Configuration ####
Open up the config.inc.php and change the values you need
#### Diff Files
To make a new diff just add the file name in the DIFF directory with what you want appended and if you want to change the level. Look at the scripts_example.txt

This would change the level to 1 from 7 and then append the following to the end
```sh
1 "BIS_fnc_" !"BIS_fnc_setVehicleMass_fsm" !"bis_fnc_initVehicle" !"MYVAR_"
```
#### Using the Tools ####
To use this tool just run the following
```sh
php bebuilder.php
```

This could be automated to run every restart of the server just by using a simple pre server startup script

#### Credits ####