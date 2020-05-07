<script>
  import Card from "./Card.svelte";
  import { onMount } from "svelte";
  onMount(() => {
    console.log("the component has mounted");
  });
</script>

<style>
  @import "css/app.css";
</style>

<section class="container mx-auto w-full">
  <h1 class="text-center text-blue-500 font-bold text-4xl">Neptun 2</h1>
  <p class="text-center text-blue-300 font-semibold text-2xl">
    Egy csodálatos rendszer újraimplementálása
  </p>
  <div class="flex flex-col justify-between md:flex-row mt-8">
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <card-component title="Tanárok" data="2" boxcolor="green" />
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <card-component title="Diákok" data="2" boxcolor="red" />
    </div>
  </div>
  <div class="flex flex-col justify-between md:flex-row">
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <card-component title="Feladatok" data="0" boxcolor="yellow" />
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <card-component title="Megoldások" data="0" boxcolor="blue" />
    </div>
  </div>
</section>
