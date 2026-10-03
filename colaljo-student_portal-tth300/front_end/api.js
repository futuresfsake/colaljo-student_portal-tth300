const API_URL = "../back_end/";

async function getStudents() {
    const response = await fetch(API_URL + "get_students.php");
    return await response.json();
}

async function getStudent(id) {
    const response = await fetch(API_URL + "get_student.php?id=" + id);
    return await response.json();
}

async function addStudent(student) {
    const response = await fetch(API_URL + "add_student.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(student)
    });

    return await response.json();
}

async function updateStudent(student) {
    const response = await fetch(API_URL + "update_student.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(student)
    });

    return await response.json();
}

async function deleteStudent(id) {
    const response = await fetch(API_URL + "delete_student.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ id: id })
    });

    return await response.json();
}