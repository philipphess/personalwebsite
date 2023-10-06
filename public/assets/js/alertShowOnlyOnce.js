if (!document.cookie.includes("alertShown=true")) {
    alert("Diese Seite dient keinem kommerziellen Zweck und dient nur Übungszwecken.");
    document.cookie = "alertShown=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
}