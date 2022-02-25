import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Routes, RouterModule } from '@angular/router';

import { PersonnelsRoutingModule } from './personnels-routing.module';
import { PersonnelsComponent } from './personnels.component';

import { PersonnelAbsenceComponent } from './personnel-absence/personnel-absence.component';

const routes: Routes = [
  { path: '', component: PersonnelsComponent },
  { path: ':PERS_MAT_95', component: PersonnelAbsenceComponent }
];

@NgModule({
  declarations: [
    PersonnelsComponent
  ],
  imports: [
    CommonModule,
    PersonnelsRoutingModule,
    RouterModule.forChild(routes)
  ]
})
export class PersonnelsModule { }
