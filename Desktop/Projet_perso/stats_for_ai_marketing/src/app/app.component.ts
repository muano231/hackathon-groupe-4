import { Component } from '@angular/core';
import { SfamService } from './services/sfam.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title: string = 'stats_for_ai_marketing';

  constructor(private sfamService: SfamService) { }

  ngOnInit() {
  }
  
}