=> Database Table


=> Entities Table 

	-> User 
		- id
		- name
		- email
		- type
		- username
		- password
	-> Teacher:
		- id 
		- first_name
		- last_name
		- gender
		- dob
		- phone
		- email
		- address
		- position_id
		- created_by
		- created_at
		- updated_at
	-> Department 
		- id
		- name 
		- description
		- created_by
	-> position
		- id
		- name
		- description
		- department_id
		- created_by
	-> Subject:
		- id 
		- name
		- credit
		- description
		- course_id
		- created_by

	-> student_class (new )
		- id
		- student_id (primary key)
		- class_id (primary key)
		- created_by
		- updated_by

	=> class ( new )
		- id 
		- class_name
		- description

	-> Schedules​​_details (new )
		- id
		- class_id
		- subject_id
		- room_id
		- teacher_id
		- semester_id
		- Start_date
		- end_date
		- time
		- day
		- start_hour
		- end_hour
		- created_by

	-> Student
		- id
		- first_name
		- last_name
		- gender
		- dob
		- phone
		- address
		- created_by
	-> Course
		- id 
		- name
		- description
		- created_by
		
	-> Room
		- id
		- name
		- floor
		- description
		- building_id
		- created_by
	-> Building
		- id
		- name
		- description
		- created_by
	-> Semester
		- id 
		- name
		- description
		- created_by

	-> result_detail
		- id
		- exam_id
		- subject_id
		- student_id
		- marks
	-> exam
		- id
		- date
		- name
		- type
 
=> Relationship Table

	- Position  M-<______>-1   Department
	- Teacher  M-<______>-1   Position

	- Teacher  M-<______>-M  Subject
	- Teacher  M-<______>-M  class
	- Student   M-<______>-M  Teacher
	- Subject   M<_______>-M  Student
	- Course   1-<_______>-M  Subject
	- Room      1-<_______>-M Schedule
	- Teacher  1-<_______>-M Schedule
	- Student   1-<_______>-M Schedule
	- Subject    1-<_______>-M Schedule
	- Semester 1-<_______>-M Schedule
	- Room      M-<_______>-1   Building