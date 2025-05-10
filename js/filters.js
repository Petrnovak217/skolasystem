const input = document.querySelector(".search-input");
const studentBox = document.querySelector(".all_students"); 
const allStudents = document.querySelectorAll(".one-student");
const btnDesc = document.querySelector(".DESC");
const btnAsc = document.querySelector(".ASC");

const createStructure =(myArry) => {
    studentBox.innerHTML = myArry.map(student => {
        return `
            <div class="one-student-box">
                <ul class="one-student">
                    <li>${student.studentsName}</li>
                    <a href="${student.studentsLink.href}">Více informací</a>
                </ul>
            </div>
        `;
    }).join("");
}


let studentCart = [...allStudents].map((oneStudent,index)=>{
    return{
        id:index,
        studentsName:oneStudent.querySelector("li").textContent,
        studentsLink:oneStudent.querySelector("a"),
    }
})

input.addEventListener("input",() =>{
    const inputText = input.value.toLowerCase();
    
    const filterStudent = studentCart.filter((student) =>{

        return student.studentsName.toLowerCase().includes(inputText);
    })

    createStructure(filterStudent);
    
})



btnAsc.onclick = () => {
    studentCart.sort((a, b) => a.studentsName.localeCompare(b.studentsName)); 
    createStructure(studentCart)

};

btnDesc.onclick = () => {
    studentCart.sort((a, b) => b.studentsName.localeCompare(a.studentsName));
    createStructure(studentCart)
};


