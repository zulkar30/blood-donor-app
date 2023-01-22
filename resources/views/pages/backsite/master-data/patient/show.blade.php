<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ isset($patient->name) ? $patient->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Gender</th>
        <td>
            @if ($patient->gender == 1)
                <span>Laki - laki</span>
            @else
                <span>Perempuan</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Blood Type</th>
        <td>{{ isset($patient->blood_type) ? $patient->blood_type : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Age</th>
        <td>{{ isset($patient->age) ? $patient->age . ' Tahun' : 'N/A' }}</td>
    </tr>
</table>
