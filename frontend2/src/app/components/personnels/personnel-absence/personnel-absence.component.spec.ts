import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PersonnelAbsenceComponent } from './personnel-absence.component';

describe('PersonnelAbsenceComponent', () => {
  let component: PersonnelAbsenceComponent;
  let fixture: ComponentFixture<PersonnelAbsenceComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ PersonnelAbsenceComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(PersonnelAbsenceComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
