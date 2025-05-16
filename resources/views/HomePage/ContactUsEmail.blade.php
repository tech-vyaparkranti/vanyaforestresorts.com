<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Contact Us Email</h2>

<table>
  <tr>
    <th>Name</th>
    <th>{{ ($contactUs["first_name"]??"").($contactUs["last_name"]??"") }}</th>
  </tr>
  <tr>
    <th>Email</th>
    <th>{{ ($contactUs["email"]??"") }}</th>
  </tr>
  
  <tr>
    <th>Phone Number</th>
    <th>{{ ($contactUs["phone_number"]??"") }}</th>
  </tr>
  
  <tr>
    <th>Message</th>
    <th>{{ ($contactUs["message"]??"") }}</th>
  </tr>
</table>

</body>
</html>

