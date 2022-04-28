import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AlldemandesComponent } from './alldemandes.component';

describe('AlldemandesComponent', () => {
  let component: AlldemandesComponent;
  let fixture: ComponentFixture<AlldemandesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AlldemandesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AlldemandesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
