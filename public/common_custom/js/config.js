

function setToken(token){
    localStorage.setItem("token", `Bearer ${token}`);
}

function getToken(){
    return localStorage.getItem("token");
}

function HeaderToken(){
    let token = getToken();
    return {
        headers:{
            Authorization:token
        }
    }
}
