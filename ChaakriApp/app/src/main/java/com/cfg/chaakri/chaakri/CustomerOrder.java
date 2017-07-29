package com.cfg.chaakri.chaakri;

import android.support.annotation.IdRes;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

public class CustomerOrder extends AppCompatActivity {
    RadioGroup type,location;
    EditText quantity;
    RadioButton r1,r2,r3,r4,r5,r6,r7,r8,r9,l1,l2;
    Button orderbutton;
    int idx=99;
    String x="";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_customer_order);
        type=(RadioGroup)findViewById(R.id.type);
        quantity=(EditText)findViewById(R.id.quantity);
        location=(RadioGroup)findViewById(R.id.location);
        r1=(RadioButton)findViewById(R.id.radiobutton1);
        r2=(RadioButton)findViewById(R.id.radiobutton2);
        r3=(RadioButton)findViewById(R.id.radiobutton3);
        r4=(RadioButton)findViewById(R.id.radiobutton4);
        r5=(RadioButton)findViewById(R.id.radiobutton5);
        r6=(RadioButton)findViewById(R.id.radiobutton6);
        r7=(RadioButton)findViewById(R.id.radiobutton7);
        r8=(RadioButton)findViewById(R.id.radiobutton8);
        r9=(RadioButton)findViewById(R.id.radiobutton9);
        l1=(RadioButton)findViewById(R.id.currentlocation);
        l2=(RadioButton)findViewById(R.id.otherlocation);
        orderbutton=(Button)findViewById(R.id.orderbutton);
        orderbutton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                int typeid=type.getCheckedRadioButtonId();
                switch(typeid)
                {
                    case (R.id.radiobutton1) :
                        x="1";
                        break;
                    case (R.id.radiobutton2) :
                        x="2";
                        break;
                    case (R.id.radiobutton3) :
                        x="3";
                        break;
                    case (R.id.radiobutton4) :
                        x="4";
                        break;
                    case (R.id.radiobutton5) :
                        x="5";
                        break;
                    case (R.id.radiobutton6) :
                        x="6";
                        break;
                    case (R.id.radiobutton7) :
                        x="7";
                        break;
                    case (R.id.radiobutton8) :
                        x="8";
                        break;
                    case (R.id.radiobutton9) :
                        x="9";
                        break;
                }
                Toast.makeText(CustomerOrder.this,x,Toast.LENGTH_SHORT).show();


            }
        });

    }
}
