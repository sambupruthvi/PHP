/*
	ZID:Z1804923
	NAME:PRUTHVI SAMBU
	SECTION:2
	INSTRUCTOR:JON LEHUTA
	DUE DATE:04/28/2017
*/

//Header files declaration
#include<iostream>
#include<mysql.h>
#include<string>
#include<iomanip>

using namespace std;

//Initializing Global Variables
MYSQL *connec,mysql;
MYSQL_RES *result,*result2,*result3;
MYSQL_ROW row,row2,row3;
int query_state;

//main method
int main()
{
//Connection to the Database
   mysql_init(&mysql);
   connec = mysql_real_connect(&mysql,"courses","z1804923","1995Mar27","z1804923",0,0,0);
   if(connec == NULL)
     {
	cout<<mysql_error(&mysql)<<endl;
     }
   else
     {
	cout<<"connected"<<endl;
     }
//Query to get the values from flight
mysql_query(connec,"select * from flight");
result = mysql_store_result(connec);
cout<<"Flight info:";
//int count=0;
//Condition to check and fetch the flight info
   while((row = mysql_fetch_row(result)) != NULL)
    {
	int count =0;
	string flightnum = row[0];
	cout<<endl<<setw(2)<<row[0]<<"\t"<<right<<row[1]<<"-"<<row[2]<<setw(7)<<row[3]<<"\t"<<endl;
//Query to get the values of the passengers who boarded the flight
	string query = "SELECT passenger.passnum, passenger.lastname, passenger.firstname FROM passenger,manifest WHERE manifest.passnum = passenger.passnum and manifest.flightnum =\""+flightnum+"\"";
	mysql_query(connec,query.c_str());
	result2 = mysql_store_result(connec);
//Condition to check if the flight is empty or no passengers
	if(mysql_affected_rows(connec)  == 0)
	{
	   cout<<"\t" "\t" "\t"<<"No Passenger Found!!!"<<endl;
	}
//Loop to get every passenger detailes in the flight
	while((row2 = mysql_fetch_row(result2)) != NULL)
	{
	   count++;
	   cout<<"\t \t \t"<<setw(2)<<row2[0]<<"\t"<<row2[1]<<","<<row2[2]<<"\t"<<endl;
	}
//Condition for the number of passengers boarded in the flight
	cout<<"Number of passengers in the flight are: "<<count<<endl;
	//Another method to do it

/*	string query2 = "SELECT count(*) FROM passenger,manifest WHERE manifest.passnum = passenger.passnum and  manifest.flightnum = \""+flightnum+"\"";
	mysql_query(connec,query2.c_str());
	result3 = mysql_store_result(connec);
//Loop to get the count
	cout<<"Number of passengers in the flight are: "<<count;
	//if(mysql_affected_rows(connec)  != 0)
	while((row3 = mysql_fetch_row(result3)) != NULL)
	{
	  cout<<"Number of passengers in the flight are: "<<row3[0]<<endl;;
	}*/
   }
	mysql_free_result(result);
	mysql_free_result(result2);
//Closing the connection
	mysql_close(connec);
}
