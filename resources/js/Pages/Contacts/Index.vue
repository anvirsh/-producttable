<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Contacts</h1>
    <div class="mb-6 flex justify-between items-center">


    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="px-6 pt-6 pb-4">Name</th>
          <th class="px-6 pt-6 pb-4">Organization</th>
          <th class="px-6 pt-6 pb-4">City</th>
          <th class="px-6 pt-6 pb-4" colspan="2">Phone</th>
        </tr>
        <tr   class="hover:bg-gray-100 focus-within:bg-gray-100">
           <td class="border-t">
              {{ user.name }}
              <icon v-if="contact.deleted_at" name="trash" class="flex-shrink-0 w-3 h-3 fill-gray-400 ml-2" />
          </td>
		   <td class="border-t">
              {{ user.name }}
              <icon v-if="contact.deleted_at" name="trash" class="flex-shrink-0 w-3 h-3 fill-gray-400 ml-2" />
          </td>
		  <td class="border-t">
              {{ user.name }}
              <icon v-if="contact.deleted_at" name="trash" class="flex-shrink-0 w-3 h-3 fill-gray-400 ml-2" />
          </td>
		  <td class="border-t">
              {{ user.name }}
              <icon v-if="contact.deleted_at" name="trash" class="flex-shrink-0 w-3 h-3 fill-gray-400 ml-2" />
          </td>
		  <td class="border-t">
              {{ user.name }}
              <icon v-if="contact.deleted_at" name="trash" class="flex-shrink-0 w-3 h-3 fill-gray-400 ml-2" />
          </td>
        </tr>
        <tr v-if="contacts.data.length === 0">
          <td class="border-t px-6 py-4" colspan="4">No contacts found.</td>
        </tr>
      </table>
    </div>
    
  </div>
</template>

<script>
 

export default {
  metaInfo: { title: 'Contacts' },
  components: {
  
  },
  layout: Layout,
  props: {
    filters: Object,
    contacts: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function() {
        //this.$inertia.get(this.route('contacts'), pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
