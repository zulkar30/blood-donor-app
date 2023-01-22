<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ isset($donor->name) ? $donor->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Gender</th>
        <td>@if ($donor->gender == '1')
            <span>Laki - laki</span>
        @else
            <span>Perempuan</span>
        @endif</td>
    </tr>
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($donor->blood_type) ? $donor->blood_type : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Age</th>
        <td>{{ isset($donor->age) ? $donor->age . ' Tahun' : 'N/A' }}</td>
    </tr>
</table>
