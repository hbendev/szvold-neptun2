<script>
  export let title;
  export let data;

  export let boxcolor;
</script>

<style>
  @import "css/app.css";
</style>

<svelte:options tag="card-component" />

<div class="bg-blue-400 border border-gray-300 rounded shadow p-2 group">
  <div class="flex flex-row items-center">
    <div class="flex-shrink pr-4">
      <div
        class={`rounded p-3 bg-${boxcolor}-500 group-hover:bg-${boxcolor}-600`}>
        <i class="fas fa-user-plus fa-2x fa-fw fa-inverse" />
      </div>
    </div>
    <div class="flex-1 text-right md:text-center">
      <h5 class="font-bold uppercase text-gray-200 group-hover:text-white">
        {title}
      </h5>
      <h3 class="font-bold text-3xl text-gray-300 group-hover:text-white">
        {data || 'Betöltés..'}
      </h3>
    </div>
  </div>
</div>
