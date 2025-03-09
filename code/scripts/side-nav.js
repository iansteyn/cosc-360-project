/* side-nav.js
--------------------------------------
Performs the following dynamic actions:
- highlighting link of current page
- collapsing and expanding the navbar on button press
-------------------------------------- */

// TEMPORARY {{{{{{{
// LOGOUT STUFF
// -----------------------
const logoutLink = document.getElementById("logout-link");
logoutLink.addEventListener("click", ()=> logout());

function logout() {
    if(confirm("Are you sure you want to log out?")) {
        window.location.href = "login.php";
    }
}

// }}}}}}} 

// HIGHLIGHT NAVLINK OF CURRENT PAGE
// ---------------------------------
const navLinks = document.querySelectorAll(".nav-link");
const currentPage = window.location.href.split("?")[0];

for (navLink of navLinks) {
    if ((navLink.href  === currentPage) && (navLink.id != "nav-logo")) {
        navLink.classList.add("current-page");
    }
}

// COLLAPSE/EXPAND NAV
// -------------------
const navCollapseButton = document.getElementById("nav-collapse-button");

// SET CORRECT COLLAPSE STATE
// (maintains same state as previous page)
if(sessionStorage.getItem("navCollapsed")) {
    collapseNav();
}
else{
    expandNav();
}

// CONFIGURE BUTTON
navCollapseButton.addEventListener("click", () => {
    if(sessionStorage.getItem("navCollapsed")) {
        expandNav();
    }
    else{
        collapseNav();
    }
});

// HELPER FUNCTIONS
function collapseNav() {
    for (navLink of navLinks) {
        navLink.classList.add("collapsed");
    }
    navCollapseButton.textContent = ">";
    navCollapseButton.title = "Expand Navigation";
    sessionStorage.setItem("navCollapsed", "true");
}

function expandNav() {
    for (navLink of navLinks) {
        navLink.classList.remove("collapsed");
    }
    navCollapseButton.textContent = "<";
    navCollapseButton.title = "Collapse Navigation";
    sessionStorage.removeItem("navCollapsed");
}
// ---------------------------------------------------------

// THEME SWITCHING STUFF
// ---------------------
const themeMenuButton = document.getElementById("theme-menu-button");
const themeSwitcherMenu = document.querySelector(".theme-switcher-menu");

themeMenuButton.addEventListener("click", (clickEvent)=> {
    if (themeMenuButton.classList.contains("theme-menu-button-active")) {
        deactivateThemeMenu();
    }
    else {
        activateThemeMenu(clickEvent);
    }
});


// Helpers
function activateThemeMenu(clickEvent) {
    themeMenuButton.classList.add("theme-menu-button-active");
    themeSwitcherMenu.classList.remove("hidden");
    clickEvent.stopPropagation(); // Stops the window onclick event from also immediately firing
    window.addEventListener("click", deactivateThemeMenu); // so user can click anywhere to close menu
}

function deactivateThemeMenu() {
    themeMenuButton.classList.remove("theme-menu-button-active");
    themeSwitcherMenu.classList.add("hidden");
    window.removeEventListener("click", deactivateThemeMenu);
}

// Actual theme switching
const themeButtons = document.querySelectorAll(".theme-button");
const themeIcons = document.querySelectorAll("#theme-menu-button .icon-inline")

themeButtons.forEach((button) => {
    button.addEventListener("click", (clickEvent)=> {
        clickEvent.stopPropagation();
        setThemeIcon(button);
        // loadTheme(button.value);
    });
});

function setThemeIcon(button) {
    for (let i = 0; i < themeButtons.length; i++) {
        themeButtons[i].classList.remove("theme-button-active");
        themeIcons[i].classList.add("hidden");
    }

    button.classList.add("theme-button-active");

    const currentThemeIcon = document.getElementById(`icon-theme-${button.value}`);
    currentThemeIcon.classList.remove("hidden");

    // document.documentElement.setAttribute("data-theme", "light");
}

