let resume = document.querySelector('#resumeText')
resume.addEventListener("input", ()=>{
    let resumeEdit = document.querySelector('.resume')
    resumeEdit.textContent = `${"Votre texte fait : " + resume.textLength + " caractères"}`;
    if(resume.textLength < 1){
        resumeEdit.textContent = "";
    }
})

let commentaires = document.querySelector('#commentaires')
commentaires.addEventListener("input", ()=>{
    let commentairesEdit = document.querySelector('.commentaires')
    commentairesEdit.textContent = `${"Votre texte fait : " + commentaires.textLength + " caractères"}`;
    if(commentaires.textLength < 1){
        commentairesEdit.textContent = "";
    }
})