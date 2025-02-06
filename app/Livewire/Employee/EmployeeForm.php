<?php

namespace App\Livewire\Employee;
use Livewire\Component;
use App\Models\Employee;


class EmployeeForm extends Component
{
    // Main form fields
    public string $firstName = '';
    public string $lastName = '';
    public string $department = '';
    public $bgColor = 'bg-white'; // default color
    // Static array for departments
    public $departments = ['HR', 'Sales', 'Marketing', 'IT', 'Finance'];

    // Dynamic extra fields array
    public $extraFields = [];

    // Validation rules
    protected function rules(): array
    {
        return [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'department' => ['required', Rule::in($this->departments)],
            'extraFields.*.name' => 'nullable|string|max:255',
        ];
    }

    // Method to add a new extra field
    public function addField()
    {
        $this->extraFields[] = ['name' => ''];
    }

    public function removeField(int $index): void
    {
        unset($this->extraFields[$index]);
        $this->extraFields = array_values($this->extraFields);
    }

    // Save method to validate and store the employee record
    public function save(): void
    {
        $validatedData = $this->validate();

        Employee::create([
            'first_name' => $validatedData['firstName'],
            'last_name' => $validatedData['lastName'],
            'department' => $validatedData['department'],
            'extra_fields' => json_encode($validatedData['extraFields']),
        ]);

        session()->flash('message', 'Employee saved successfully!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.employee.employee-form')->layout('layouts.app');
    }

}
