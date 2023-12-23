import React, { useState, useEffect } from 'react';
import axios from 'axios';

const Attendance = () => {
    const [attendanceData, setAttendanceData] = useState([]);
    const [empData, setEmpData] = useState([]);
    const [employees, setEmployees] = useState([]);
    const [selectedEmpId, setSelectedEmpId] = useState(1); // Default employee ID

    useEffect(() => {
        // Fetch attendance data from the Laravel API based on the selected employee ID
        axios.get(`http://backendtask.test/api/v1/attendance/${selectedEmpId}?per_page=10`)
            .then(response => {
                setAttendanceData(response.data.attendance);
                setEmpData(response.data.employee);
            })
            .catch(error => {
                console.error('Error fetching attendance data:', error);
            });
    }, [selectedEmpId]);

    useEffect(() => {
        // Fetch employee data for the dropdown from another endpoint
        axios.get('http://backendtask.test/api/v1/employees')
            .then(response => {
                const employeeArray = Object.entries(response.data).map(([id, name]) => ({ id, name }));
                setEmployees(employeeArray);
            })
            .catch(error => {
                console.error('Error fetching employee data:', error);
            });
    }, []);

    const handleEmpChange = (event) => {
        const newEmpId = event.target.value;
        setSelectedEmpId(newEmpId);
    };

    return (
        <div className="container mt-5">
            <h1 className="mb-4">Attendance Information</h1>

            {/* Employee Dropdown */}
            <div className="mb-3 col-md-4">
                <label htmlFor="employee" className="form-label">Select Employee: </label>
                <select id="employee" className="form-select form-control" value={selectedEmpId} onChange={handleEmpChange}>
                    {employees.map(employee => (
                        <option key={employee.id} value={employee.id}>{employee.name}</option>
                    ))}
                </select>
            </div>


            {/* Employee Info */}
            {empData && (
                <div className="mb-4">
                    <h2>Employee Info</h2>
                    <p>ID: {empData.id}</p>
                    <p>Name: {empData.name}</p>
                    <p>Email: {empData.email}</p>
                    <p>Phone: {empData.phone}</p>
                    {/* Add more employee information from empData as needed */}
                </div>
            )}

            {/* Display Attendance Table */}
            <table className="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Total Working Hours</th>
                </tr>
                </thead>
                <tbody>
                {attendanceData.map(attendance => (
                    <tr key={attendance.id}>
                        <td>{empData.name}</td>
                        <td>{attendance.check_in || 'N/A'}</td>
                        <td>{attendance.check_out || 'N/A'}</td>
                        <td>{attendance.worked_hour || 'N/A'}</td>
                    </tr>
                ))}
                </tbody>
            </table>
        </div>
    );
};

export default Attendance;
