<script>
  import Card from "./Card.svelte";
  import { onMount } from "svelte";
  let teacherCount = undefined;
  let studentCount = undefined;
  let taskCount = undefined;
  let solutionCount = undefined;
  onMount(async function() {
    teacherCount = await fetch("/api/teacherCount").then(count => count.text());
    studentCount = await fetch("/api/studentCount").then(count => count.text());
    taskCount = await fetch("/api/taskCount").then(count => count.text());
    solutionCount = await fetch("/api/solutionCount").then(count =>
      count.text()
    );
  });
</script>

<style>
  @import "/css/app.css";
</style>

<section class="container mx-auto w-full">
  <h1 class="text-center text-blue-500 font-bold text-4xl">Neptun 2</h1>
  <p class="text-center text-gray-700 font-semibold text-2xl">
    Egy csodálatos rendszer újraimplementálása
  </p>
  <p class="text-center text-gray-600 font-medium text-xl">
    Lehet jelenetkezni tanárként, diákként, kurzusokat bejegyezni, szerkeszteni
    és felvenni diákként, későbbiekben pedig feladatokat is lehet majd kiírni a
    diákok számára, ők pedig a felületen betudják adni majd.
  </p>
  <div class="flex flex-col justify-between md:flex-row mt-8">
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <card-component title="Tanárok" data={teacherCount} boxcolor="green" />
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <card-component title="Diákok" data={studentCount} boxcolor="red" />
    </div>
  </div>
  <div class="flex flex-col justify-between md:flex-row">
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <card-component title="Feladatok" data={taskCount} boxcolor="yellow" />
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <card-component title="Megoldások" data={solutionCount} boxcolor="blue" />
    </div>
  </div>
</section>
