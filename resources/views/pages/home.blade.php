<x-layouts.main>
	<x-slot name="pageTitle">Home</x-slot>
	<div class="row row-space-10 m-b-20">
		<div class="col-lg-12 col-sm-6">
			<x-elements.panel title="3 Karyawan Pertama Kali Bergabung">
				<x-slot name="body">
					<livewire:table.employee-table :firstJoin="true" :perPage="3"/>
				</x-slot>
			</x-elements.panel>
		</div>
	</div>
	<div class="row row-space-10 m-b-20">
		<div class="col-lg-6 col-sm-12">
			<x-elements.panel title="Karyawan yang pernah mengambil cuti">
				<x-slot name="body">
					<livewire:table.employee-permit-table/>
				</x-slot>
			</x-elements.panel>
		</div>
		<div class="col-lg-6 col-sm-12">
			<x-elements.panel title="Karyawan yang pernah mengambil cuti > 1">
				<x-slot name="body">
					<livewire:table.employee-permit-table :moreThanOne="true"/>
				</x-slot>
			</x-elements.panel>
		</div>
	</div>


</x-layouts.main>