<!DOCTYPE html>
<html>
<head>
  <title>Donor List</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .select-all {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <h1>Donor List</h1>

  <form action="Admin-NGO-list.html" method="POST">
    <table>
      <thead>
        <tr>
          <th class="select-all">
            <input type="checkbox" id="select-all-checkbox">
            <label for="select-all-checkbox">Select All</label>
          </th>
          <th>Donor Name</th>
          <th>Confirmed</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <input type="checkbox" class="row-checkbox" name="donor[]" value="John Doe">
          </td>
          <td>John Doe</td>
          <td>Yes</td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" class="row-checkbox" name="donor[]" value="Jane Smith">
          </td>
          <td>Jane Smith</td>
          <td>No</td>
        </tr>
        <!-- Add more rows as needed -->
      </tbody>
    </table>

    <div>
      <button type="submit" name="accept">Accept</button>
      <button type="submit" name="reject">Reject</button>
    </div>
  </form>
</body>
</html>
