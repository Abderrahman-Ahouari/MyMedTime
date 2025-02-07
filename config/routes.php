<?php
$route->add('cancelReservation','UserController','cancelReservation');
$route->add('login','UserController','login');
$route->add('logout','UserController','logout');

$route->add('DoctorSignup','DoctorController','doctorsignup');
$route->add('getDoctorReservations','DoctorController','getDoctorReservations');
$route->add('addDisponibility','DoctorController','addDisponibility');

$route->add('PatientSignup','patientController','patientsignup');
$route->add('TakeReservation','patientController','TakeReservation');
$route->add('getPatientReservations','patientController','getPatientReservations');


