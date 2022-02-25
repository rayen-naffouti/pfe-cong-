import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PersonnelsComponent } from './personnels.component';
import { PersonnelAbsenceComponent } from './personnel-absence/personnel-absence.component';
import { CommonModule } from '@angular/common';

const routes: Routes = [{ path: '', component: PersonnelsComponent }];

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forChild(routes)],
  exports: [RouterModule],
  declarations: [
    PersonnelAbsenceComponent
  ]
})
export class PersonnelsRoutingModule { }
