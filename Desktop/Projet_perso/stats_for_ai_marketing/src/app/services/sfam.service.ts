import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Subject } from 'rxjs';
import { HttpRequestService } from './http-request.service';

@Injectable({
  providedIn: 'root'
})
export class SfamService {
  getAllStatsSubject = new Subject;

  constructor(private http: HttpClient, private httpRequestService: HttpRequestService) { }

  // CREATE


  // READ
  getAllStats() {
    this.http.post(this.httpRequestService.sfam,{
      "choix":"getAllStats",
    }).subscribe((data)=>{
      this.sendAllStats(data)
    })
  }

  sendAllStats(data: any) {
    this.getAllStatsSubject.next(data)
  }
  
  // UPDATE


  // DELETE


}
