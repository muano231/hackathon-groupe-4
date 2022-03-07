import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ChartType } from 'angular-google-charts';
import { SfamService } from '../services/sfam.service';

@Component({
  selector: 'app-sfam-contenu',
  templateUrl: './sfam-contenu.component.html',
  styleUrls: ['./sfam-contenu.component.css']
})
export class SfamContenuComponent implements OnInit {
  AMStats: any;
  allStats: any;

  addStatForm: FormGroup;
  currentDate: Date;

  title = 'Browser market shares at a specific website, 2014';
  type = ChartType.ColumnChart;
  data: any = [];
  columnNames = ['Browser', 'Percentage'];
  options = {
    colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'], is3D: true
  };
  width = 1100;
  height = 400;

  constructor(private sfamService: SfamService, private formBuilder: FormBuilder) {
    this.currentDate = new Date()
  }

  ngOnInit() {
    this.sfamService.getAllStats();
    this.sfamService.getAllStatsSubject.subscribe((data)=>{
      this.AMStats = data;
      this.allStats = this.AMStats['stats']
      for (let i = 0; i < this.allStats.length; i++) {
        this.data.push([this.allStats[i].Date, Number(this.allStats[i].Cashback)])
      }
    })
  }

  initForm() {
    this.addStatForm = this.formBuilder.group({
      date: [this.currentDate,Validators.required],
    })
  }

  onSubmit() {
    
  }

}
