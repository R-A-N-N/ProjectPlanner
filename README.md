# PROJECT PLANNER

A website to plan your projects effortlessly! This project planner lets you manage your projects with ease, keeping a track of all your changes with an integrated MySQL database. Users can join/create multiple projects at a time and switch easily between the projects! Each project is protected with a username and password. The project layout consists of a dashboard with options to create entries, make to-do lists or assign tasks. This planner provides you with an organised space to effectively plan your project with your group.

Website link - https://projectplanner123.000webhostapp.com/



## DEPLOY THE APPLICATION ON EC2 WITH FEW EASY STEPS

- Go to aws management console 
- In services, choose Instances and then launch an instance 
- Choose AMI: Microsoft Windows Server 2022 Base (in Free Tier)
- Instance Type: t2.micro
- No change in Instance Details.
- No change is Storage. Assigned storage is sufficient.
- Add a tag: No change 
- Security Group Configuration: Add Rules: Custom TCP protocol and set port number to 8080. Add HTTP and HTTPS rules as well.	
- When asked for Key Pair, select Create a new Key Pair. Name the Key Pair and create. A .pem file will be downloaded. Know the location of this file for further use.
- Launch the instance
- Go to EC2>>Instances and wait for the Instance State to display Running and Status Check to display 2/2 checks passed before proceeding.


## SCREENSHOTS

1) To do lists= tab

![alt text](https://github.com/AmrutaKoshe/Project-Planner/blob/master/to%20do%20list.PNG)

2) Tasks tab

![alt text](https://github.com/AmrutaKoshe/Project-Planner/blob/master/tasks.PNG)

3) Entries tab

![alt text](https://github.com/AmrutaKoshe/Project-Planner/blob/master/entries.PNG)
