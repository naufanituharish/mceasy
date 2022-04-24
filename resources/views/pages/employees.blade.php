<x-layouts.main>
	<x-slot name="pageTitle">Employee List</x-slot>
	<x-elements.panel title="Employee List">
		<x-slot name="heading">
			<livewire:button-modal-form 
				formName="employee-form" 
				text="Create" 
				formMethod="Create" 
				:modalProps="['modalTitle' => 'Create Empoyee Data']"/>
		</x-slot>
		<x-slot name="body">
			<livewire:table.employee-table/>
			<livewire:modal-form/>
		</x-slot>
	</x-elements.panel>
</x-layouts.main>