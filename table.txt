create table students(
  id int not null primary key auto_increment,
  name varchar(20),
  mobile_no integer(15),
  gender varchar(5),
  email varchar(25),
  address varchar(25),
  sslc integer(5),
  hsc integer(5),
  cgpa integer(5),
  languages varchar(10),
  internships varchar(20),
  preferred_loc varchar(10),
  password varchar(20),
  applied_job varchar(20),
  company_applied varchar(20) );


create table company(
  id integer(10),
  name varchar(20),
  password varchar(20),
  post_job varchar(10),
  salary integer(10),
  eligibility_criteria integer(5),
  email varchar(20) );
  


create table admin(
 name varchar(20),
 password varchar(20) );

