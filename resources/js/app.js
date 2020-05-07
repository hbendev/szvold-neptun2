/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Svelte and other libraries. It is a great starting point when
 * building robust, powerful web applications using Svelte and Laravel.
 */

require("./bootstrap");

import Welcome from "./components/Welcome.svelte";
import Home from "./components/Home.svelte";
import TeacherHome from "./components/TeacherHome.svelte";
import StudentHome from "./components/StudentHome.svelte";
import NotEnrolledList from "./components/NotEnrolledList.svelte";
import Header from "./components/Header.svelte";

customElements.define("welcome-page", Welcome);
customElements.define("home-page", Home);
customElements.define("teacher-home", TeacherHome);
customElements.define("student-home", StudentHome);
customElements.define("enroll-page", NotEnrolledList);
customElements.define("header-component", Header);
