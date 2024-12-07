

function setToken(token){
    localStorage.setItem("token", `Bearer ${token}`);
}

function getToken(){
    return localStorage.getItem("token");
}

