<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
 <title>Your Profile</title>
 <style type="text/css">
table,td  {
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
}
span{
  font-size: 22px;
  font-weight: 600;
}
</style>
</head>
<body>
  <span>Profile Information</span>
  <table>
      <tr>
          <td> First Name</td>
          <td>{{$first_name}}</td>
      </tr>
      <tr>
          <td> Last Name</td>
          <td>{{$last_name}}</td>
      </tr>
      <tr>
          <td>  Moblie Number</td>
          <td>{{$phone}}</td>
      </tr>
      <tr>
          <td>  Date of Birth</td>
          <td>{{$dob}}</td>
      </tr>
      <tr>
          <td>   Patient ID</td>
          <td>{{$patient_id}}</td>
      </tr>
  </table>
  <br />
  <span>Address</span>
  <table>
      <tr>
          <td>  Address 1</td>
          <td>{{$address_1}}</td>
      </tr>
      <tr>
          <td>  Address 2</td>
          <td>{{$address_2}}</td>
      </tr>
      <tr>
          <td>  City</td>
          <td>{{$city}}</td>
      </tr>
      <tr>
          <td>  State</td>
          <td>{{$state_code}}</td>
      </tr>
      <tr>
          <td>  Zip Code</td>
          <td>{{$zip}}</td>
      </tr>
    </table>
    <br />
    <span>Shipping Address</span>
    <table>
      <tr>
          <td>  Address 1</td>
          <td>{{$billing_address_1}}</td>
      </tr>
      <tr>
          <td>  Address 2</td>
          <td>{{$billing_address_2}}</td>
      </tr>
      <tr>
          <td>  City</td>
          <td>{{$billing_city}}</td>
      </tr>
      <tr>
          <td>  State</td>
          <td>{{$billing_state}}</td>
      </tr>
      <tr>
          <td>  Zip Code</td>
          <td>{{$billing_zip}}</td>
      </tr>
  </table> 
  <br />
  <span>Questions</span>
  <table>
    <tr>
      <td>I have Had a Bone Marrow transplant or treatment of hematological maligancies (blood cancers):</td>
      <td>{{$answer1}}</td>
    </tr>
    <tr>
      <td>
        I have a branded retainer:
      </td>
      <td>{{$answer2}}</td>
    </tr>
    <tr>
      <td>I have crowns:</td>
      <td>{{$answer3}}</td>
    </tr>
    <tr>
      <td>I have primary (baby) teeth:</td>
      <td>{{$answer4}}</td>
    </tr>
    <tr>
      <td>I have bridgework:</td>
      <td>{{$answer5}}</td>
    </tr>
    <tr>
      <td>I have Had a Bone Marrow transplant or treatment of hematological maligancies (blood cancers):</td>
      <td>{{$answer6}}</td>
    </tr>
    <tr>
      <td>I have an impacted tooth:</td>
      <td>{{$answer7}}</td>
    </tr>
    <tr>
      <td>I have an implant:</td>
      <td>{{$answer8}}</td>
    </tr>
    <tr>
      <td>I have eneers:</td>
      <td>{{$answer9}}</td>
    </tr>
    <tr>
      <td>I have a recent radiograph of my teeth:</td>
      <td>{{$answer10}}</td>
    </tr>
    <tr>
      <td>Do you feel pain in any of your teeth?</td>
      <td>{{$answer11}}</td>
    </tr>
    <tr>
      <td>Do you have any sores or lumps in or near your mouth?</td>
      <td>{{$answer12}}</td>
    </tr>
    <tr>
      <td>Do you currently have any head, neck or jaw injuries?</td>
      <td>{{$answer13}}</td>
    </tr>
    <tr>
      <td>Do you currently experience: jaw clicking, pain, difficulty opening and /or closing or difficulty chewing?</td>
      <td>{{$answer14}}</td>
    </tr>
    <tr>
      <td>Have you noticed any loosening of your teeth or do you have untreated periodontal disease?</td>
      <td>{{$answer15}}</td>
    </tr>
    <tr>
      <td>Do you have any known allergies to any dental materials?</td>
      <td>{{$answer16}}</td>
    </tr>
    <tr>
      <td>I have a history of IV bisphosphonate treatment:</td>
      <td>{{$answer17}}</td>
    </tr>
    <tr>
      <td>I am currently on acute corticosteroids or in immunosuppression,chemotherapy, or radiation:</td>
      <td>{{$answer18}}</td>
    </tr>
    <tr>
      <td>Chief Complaint:</td>
      <td>{{$answer19}}</td>
    </tr>  
  </table>
</body>
</html>