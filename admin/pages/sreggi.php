<html>
<head>
<title>REGISTRATION</title>

</head> <body>
<link href="..\css\Regi.css" rel="stylesheet" type="text/css"/>
          <div class="image">
    <div Class="main">
    <h2 class='head1' align-content="center">Registration</h2>
          <Form action="dsregi.php" class="templatemo-registration-form" method="POST">
            <Row form>
              <Col md={6}>
                <FormGroup>
                  <Label for="Student ID"> ID</Label>
                  <Input type="Staff ID" name="ID" id="ID" placeholder="ID" />
                </FormGroup>
              </Col>
              <Col md={6}>
                <FormGroup>
                  <Label for="Name">Name</Label>
                  <Input type="name" name="name" id="name" placeholder="Name" />
                </FormGroup>
              </Col>
            </Row>
            <Row form>
            <Col md={6}>
                <FormGroup>
                  <Label for="fatherName">Father's Name</Label>
                  <Input type="fathername" name="fathername" id="fathername" placeholder="Father's Name" />
                </FormGroup>
              </Col>
              <Col md={6}>
                <FormGroup>
                  <Label for="Email">Email</Label>
                  <Input type="email" name="email" id="email" placeholder="@gmail.com" />
                </FormGroup>
              </Col>
             
            </Row>
            <Row form>
            <Col md={6}>
                <FormGroup>
                  <Label for="Department">Department</Label>
                  <Input type="text" name="Department" id="Department" placeholder="Electrical/Mechanical.."/>
                </FormGroup>  
              </Col>
              <Col md={4}>
                <FormGroup>
                  <Label for="Course">Course</Label>
                  <Input type="text" name="course" id="course" placeholder="Course"/>
                </FormGroup>
              </Col>
              
              <Col md={2}>
                <FormGroup>
                  <Label for="Year">Year</Label>
                  <Input type="text" name="year" id="year"/>
                </FormGroup>
              </Col>
              
            </Row>
            <Row form>
            <Col md={6}>
                <FormGroup>
                  <Label for="Contact Number" >Contact Number</Label>
                  <Input type="text" name="Contact_Number" id="Contact Number"/>
                </FormGroup>  
              </Col>
              <Col md={4}>
                <FormGroup>
                  <Label for="Date of Birth">Date of Birth</Label>
                  <Input type="text" name="Date_of_Birth" id="Date_of_Birth" placeholder="yyyy-mm-dd"/>
                </FormGroup>
              </Col>
              
              <Col md={2}>
                <FormGroup>
                  <Label for="Gender">Gender</Label>
                  <Input type="text" name="Gender" id="Gender"/>
                </FormGroup>
              </Col>
              
            </Row>
            <FormGroup>
              <Label for="Address">Address</Label>
              <Input type="text" name="address" id="address" placeholder="1234 Main St"/>
            </FormGroup>
            <FormGroup>
              <Label for="Address">Password</Label>
              <Input type="password" name="spassword" id="spassword" />
            </FormGroup>
            <br></br>
        
            <FormGroup>      
               <div class='btn1'>
               <Button color="primary" name="submit">Submit</Button>
                  
               </div>
            </FormGroup>
          </Form>
     </div>   
    </div></body>
        </html>