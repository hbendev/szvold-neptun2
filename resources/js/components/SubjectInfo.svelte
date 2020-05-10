<script>
  export let subject = {};
</script>

<style>
  @import "/css/app.css";
</style>

<section>
  <h1 class="text-center text-blue-500 font-bold text-4xl">
    {subject.name} - {subject.identifier}
  </h1>
  <div class="flex flex-col justify-center items-center space-y-4 mt-6">
    <p>Leírás: {subject.description}</p>
    <p>Kreditérték: {subject.credit}</p>
    <p>
      Létrehozás dátuma: {new Date(subject.created_at).toLocaleDateString('hu')}
    </p>
    <p>
      Utoljára módosítva: {new Date(subject.updated_at).toLocaleDateString('hu')}
    </p>
    <p>Hallgatók száma: {subject.students && subject.students.length}</p>
    <p>
      Tanár: {subject.creator && subject.creator.lastName} {subject.creator && subject.creator.firstName},
      {subject.creator && subject.creator.email}
    </p>
  </div>
  <table class="text-left w-full border-collapse container mx-auto mt-8">
    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
    <thead>
      <tr>
        <th
          class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-600
          border-b border-gray-400">
          Név
        </th>
        <th
          class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-600
          border-b border-gray-400">
          Email
        </th>
      </tr>
    </thead>
    <tbody>
      {#each subject.students || [] as student}
        <tr class="hover:bg-gray-300">
          <td class="py-4 px-6 border-b border-gray-400">
            {student.lastName} {student.firstName}
          </td>
          <td class="py-4 px-6 border-b border-gray-400">{student.email}</td>
        </tr>
      {/each}
    </tbody>
  </table>
</section>
